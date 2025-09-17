<div class="row mb-4">
    <div class="col-lg-8 mb-4">
        <div class="chart-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="chart-title mb-0">Sales Overview</h5>
                    <div class="dropdown filter-dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="salesChartDropdown" data-bs-toggle="dropdown">
                            Last 30 Days
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="salesChartDropdown">
                            <li><a class="dropdown-item active" href="#">Last 30 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="chart-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="chart-title mb-0">Order Status</h5>
                    <div class="dropdown filter-dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="orderChartDropdown" data-bs-toggle="dropdown">
                            This Month
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="orderChartDropdown">
                            <li><a class="dropdown-item active" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">Last Month</a></li>
                            <li><a class="dropdown-item" href="#">Last 3 Months</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="orderStatusChart"></canvas>
                </div>
                <div class="row text-center mt-3">
                    <div class="col-3">
                        <div class="status-badge status-completed mx-auto mb-2" style="width: 15px; height: 15px; padding: 0;"></div>
                        <p class="small mb-0">Completed</p>
                        <h6 class="mb-0">187</h6>
                    </div>
                    <div class="col-3">
                        <div class="status-badge status-pending mx-auto mb-2" style="width: 15px; height: 15px; padding: 0;"></div>
                        <p class="small mb-0">Pending</p>
                        <h6 class="mb-0">42</h6>
                    </div>
                    <div class="col-3">
                        <div class="status-badge status-transit mx-auto mb-2" style="width: 15px; height: 15px; padding: 0;"></div>
                        <p class="small mb-0">In Transit</p>
                        <h6 class="mb-0">28</h6>
                    </div>
                    <div class="col-3">
                        <div class="status-badge status-cancelled mx-auto mb-2" style="width: 15px; height: 15px; padding: 0;"></div>
                        <p class="small mb-0">Cancelled</p>
                        <h6 class="mb-0">13</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>