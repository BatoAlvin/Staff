
<table>
    <tr>
      <th>Staff Name</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Date of Birth</th>
      <th>Gender</th>
      <th>Address</th>

    </tr>
    @foreach($staffs as $staff)
    <tr>
      <td>{{$staff->staff_name}}</td>
      <td>{{$staff->staff_contact}}</td>
      <td>{{$staff->staff_email}}</td>
      <td>{{$staff->staff_dob}}</td>
      <td>{{$staff->gender}}</td>
      <td>{{$staff->staff_address}}</td>


    </tr>
@endforeach
  </table>
