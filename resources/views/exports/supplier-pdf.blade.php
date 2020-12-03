<table border="1" cellpadding="0" cellspacing="0" class="bordered" style="table-border-color-dark: #0a0800;"  width="100%">
<thead >
<tr>
    <th><b>Name</b></th>
    <th><b>Address</b></th>
    <th><b>Owner</b></th>
    <th><b>Email</b></th>
    <th><b>Sale Representative</b></th>
    <th><b>Contact No.</b></th>
    <th><b>TIN</b></th>
    <th><b>Categories</b></th>
    <th><b>Business Type</b></th>
</tr>
</thead>
<tbody>
@foreach($suppliers as $supplier)
    <tr>
        <td>{{ $supplier->name }}</td>
        <td>{{ $supplier->email }}</td>
        <td>{{ $supplier->owner }}</td>
        <td>{{ $supplier->email }}</td>
        <td>{{ $supplier->sales_representative }}</td>
        <td>{{ $supplier->contact_number }}</td>
        <td>{{ $supplier->bir_tin_number }}</td>
        <td>{{ $supplier->categories }}</td>
        <td>{{ $supplier->business_type }}</td>
    </tr>
@endforeach
</tbody>
</table>
