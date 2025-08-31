<table>
    <thead>
        <tr>
            <th>Period</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Food Sales</th>
            <th>Drink Sales</th>
            <th>Expenses</th>
            <th>Profit</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ ucfirst($period) }}</td>
            <td>{{ $startDate->format('Y-m-d') }}</td>
            <td>{{ $endDate->format('Y-m-d') }}</td>
            <td>{{ $foodSales }}</td>
            <td>{{ $drinkSales }}</td>
            <td>{{ $expenses }}</td>
            <td>{{ $profit }}</td>
        </tr>
    </tbody>
</table>
