<?php

class AjaxDataManager
{
    private $dataSources = [];
    private $requests = [];
    private $filters = [];
    private $responseData = [];

    public function __construct()
    {
        // Don't parse request here anymore
    }

    public function defineData(string $sourceName, array $config)
    {
        if (!is_callable($config['data'])) {
            throw new InvalidArgumentException("The 'data' key must be a callable for source '$sourceName'.");
        }

        $this->dataSources[$sourceName] = $config;
        return $this;
    }

    /**
     * Parse incoming AJAX request
     */
    private function parseRequest()
    {
        if (isset($_GET['AJAX_REQUEST']) && isset($_GET['requests']) && is_array($_GET['requests'])) {
            $this->requests = $_GET['requests'];

            foreach ($this->requests as $source => $request) {
                $params = $this->getArrayValue($request, 'params', []);
                $this->filters[$source] = $this->getArrayValue($params, 'filters', []);
            }
        }
    }

    // Handle the AJAX request 
    public function handleRequest()
    {
        // Only process if it's an AJAX request
        if (!self::isAjaxRequest()) {
            return;
        }

        $this->parseRequest();

        if (empty($this->requests)) {
            $this->sendResponse();
        }

        foreach ($this->requests as $source => $request) {
            $this->handleSingleSource($source, $request);
        }

        $this->sendResponse();
    }


    private function handleSingleSource(string $source, array $request)
    {
        if (!isset($this->dataSources[$source])) {
            $this->responseData[$source] = [
                'error' => "Data source '$source' not defined.",
                'data' => []
            ];
            return;
        }

        $config = $this->dataSources[$source];
        $handler = $config['data'];
        $filters = $this->filters[$source] ?? [];

        $params = [
            'filters' => $filters,
            'pagination' => $this->getArrayValue($request['params'] ?? [], 'pagination', [])
        ];

        try {
            $result = call_user_func($handler, $params);

            if (!is_array($result)) {
                throw new RuntimeException("Handler for '$source' must return an array.");
            }

            $this->responseData[$source] = $result;
        } catch (Exception $e) {
            $this->responseData[$source] = [
                'error' => $e->getMessage(),
                'data' => []
            ];
        }
    }

    private function getArrayValue(array $array, string $key, $default = null)
    {
        return $array[$key] ?? $default;
    }

    private function sendResponse()
    {
        echo json_encode([
            'success' => true,
            'data' => $this->responseData
        ]);
        exit;
    }

    public static function isAjaxRequest(): bool
    {
        return isset($_GET['AJAX_REQUEST']);
    }
}

$jdManager = new AjaxDataManager();
