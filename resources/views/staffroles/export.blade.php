
<table>
    <tr>
      <th>Staff Role</th>


    </tr>
    @foreach($staffroles as $staffrole)
    <tr>
      <td>{{$staffrole->staff_role}}</td>
    </tr>
@endforeach
  </table>
