<table>
<thead>
<tr>
    <th><b>Name</b></th>
    <th><b>Address</b></th>
    <th><b>Owner</b></th>
    <th><b>Email</b></th>
    <th><b>Sale Representative</b></th>
    <th><b>Contact Number</b></th>
    <th><b>BIR TIN number</b></th>
    <th><b>Categories</b></th>
    <th><b>Business Type</b></th>
</tr>
</thead>
<tbody>
@foreach($suppliers as $supplier)
    <tr>
        <td width="30">{{ $supplier->name }}</td>
        <td width="30">{{ $supplier->email }}</td>
        <td width="30">{{ $supplier->owner }}</td>
        <td width="30">{{ $supplier->email }}</td>
        <td width="30">{{ $supplier->sale_representative }}</td>
        <td width="30">{{ $supplier->contact_number }}</td>
        <td width="30">{{ $supplier->bir_tin_number }}</td>
        <td width="30">{{ $supplier->categories }}</td>
        <td width="30">{{ $supplier->business_type }}</td>
    </tr>
@endforeach
</tbody>
</table>
