@extends('layouts.hr-layout')

@section('content')
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>ABM 101</h2>
    <div class="bsit-consultation-page bsit101">
    <div class="table-container">
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="number">1</td>
        <td class="name">Consult BSIT 101</td>
        <td class="actions">
        <a href="{{ route('hrProfG12-ict101') }}">
          <button>View</button>
        </td>
      </tr>
      <!-- Repeat for each row -->
    </tbody>
  </table>
</div>

@endsection

