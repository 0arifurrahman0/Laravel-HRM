<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Category</title>
	<style>
	table {
	    border-collapse: collapse;
	    width: 100%;
	}

	td, th {
	    border: 1px solid #dddddd;
	    text-align: left;
	    padding: 8px;
	    font-size: 11px;
	}

	tr:nth-child(even) {
	    background-color: #dddddd;
	}
	</style>
</head>
<body>
	<h2 style="text-align: center;">
		{{ config('app.name', 'oddhayon') }}
	</h2>
	<div class="row">
	<div class="col-md-12">
	<table>
		<thead>
		<tr>
			<th>Date</th>
			<th>Savings</th>
			<th>Withdraw</th>
			<th>Balance</th>
			<th>Instalment No</th>
			<th>Instalment</th>
			<th>Loan pay</th>
		</tr>
	</thead>
	<tbody>
		@foreach($balances as $balance)
			<tr>
				<td>{{ $balance->date }}</td>
				<td>{{ $balance->savings }}</td>
				<td>{{ $balance->withdraw }}</td>
				<td>{{ $balance->balance }}</td>
				<td>{{ $balance->instalment_no }}</td>
				<td>{{ $balance->instalment }}</td>
				<td>{{ $balance->borrow }}</td>
			</tr>
		@endforeach
	</tbody>
	</table>
	</div>
	</div>
</body>
</html>