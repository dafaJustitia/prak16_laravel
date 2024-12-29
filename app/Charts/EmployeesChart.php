<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\BarChart as OriginalBarChart;
use marineusde\LarapexCharts\Options\XAxisOption;
use App\Models\Position;

class EmployeesChart
{
    public function build(): OriginalBarChart
    {
        // Fetch positions with employee counts
        $positions = Position::withCount('employees')->get();
        $positionsLabels = $positions->pluck('name')->toArray(); // Extract position names
        $employeesCount = $positions->pluck('employees_count')->toArray(); // Extract employee counts

        // Create and return a Bar Chart
        return (new OriginalBarChart)
            ->setTitle('Posisi')
            ->setSubtitle('Posisi dengan Jumlah Karyawan Terbanyak')
            ->addData('Jumlah Karyawan', $employeesCount)
            ->setXAxisOption(new XAxisOption($positionsLabels));
    }
}
