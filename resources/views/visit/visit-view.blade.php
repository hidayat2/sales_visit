<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <!-- /.col (left) -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Visit Data</h3>
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success">
                 {{ session('status') }}
            </div>
            @elseif (session('pesan'))
            <div class="alert alert-danger">
                 {{ session('pesan') }}
            </div>
        @endif
          <!-- Date -->
          <div class="row">
            <div class="col-md-1">
                <a href="{{ url('sales/add') }}" class="btn btn-block btn-primary">Add</a>
                <br>
            </div>
          </div>
          <div class="form-group">

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tannggal</th>
                            <th>PT</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $index => $post)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>{{ $post->formatted_date }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->names }}</td>
                                <td>

                                    <a href="{{ route('salesvisits.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('salesvisits.destroy', $post->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus data')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>



          </div>










      <!-- /.card -->
    </div>
    <!-- /.col (right) -->





</x-layout>
