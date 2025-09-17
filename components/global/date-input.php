<?php
$selectedValue = $selectedValue ? $selectedValue : 'date';
$options = [
    'date' => [
        'label' => 'Date',
        'class' => 'jd-date-selector-type-date',
    ],
    'today' => [
        'label' => 'Today',
        'class' => 'jd-date-selector-type-today',
    ],
    'yesterday' => [
        'label' => 'Yesterday',
        'class' => '',
    ],
    'last_7_days' => [
        'label' => 'Last 7 days',
        'class' => '',
    ],
    'last_30_days' => [
        'label' => 'Last 30 days',
        'class' => '',
    ],
    'this_month' => [
        'label' => 'This month',
        'class' => '',
    ],
    'last_month' => [
        'label' => 'Last month',
        'class' => '',
    ],
    'custom' => [
        'label' => 'Custom Range',
        'class' => '',
    ],
];
?>
<div class="jd-date-selector">
    <select class="jd-date-selector-type form-control" name="date" jd-filter="date">
        <?php foreach ($options as $value => $label) { ?>
            <option class="<?= $label['class'] ?>" value="<?= $value ?>" <?= ($value === $selectedValue) ? 'selected' : '' ?>><?= $label['label'] ?></option>
        <?php } ?>
    </select>
    <div class="jd-date-inputs" style="display: none">
        <input type="date" name="start_date" class="form-control jd-date-start" jd-filter="start_date" data-change="true">
        <input type="date" name="end_date" class="form-control jd-date-end" jd-filter="end_date" data-change="true">
    </div>
</div>