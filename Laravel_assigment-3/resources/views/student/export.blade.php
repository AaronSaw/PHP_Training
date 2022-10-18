<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Major</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->name }}</td>
                <td>{{ $invoice->age }}</td>
                <td>{{ $invoice->major->major }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
