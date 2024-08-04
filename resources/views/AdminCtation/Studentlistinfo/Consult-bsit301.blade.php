@extends('layouts.AdminConsult-layout')

@section('content')
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>BSIT 301</h2>
    <div class="bsit-consultation-page bsit301">
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
        <td class="name">Consult BSIT 301</td>
        <td class="actions">
        <a href="{{ route('Prof-bsit301') }}">
          <button>View</button>
        </td>
      </tr>
      <!-- Repeat for each row -->
    </tbody>
  </table>
</div>

@endsection

