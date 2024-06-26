@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pesan Masuk</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col" class="col-md-1 ">#</th>
              <th scope="col" class="col-md-2">From</th>
              <th scope="col" class="col-md-2">Email</th>
              <th scope="col" class="col-md-2">Phone</th>
              <th scope="col" class="col-md-4">Subject</th>
              <th scope="col" class="col-md-2">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($mails as $mail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mail->name }}</td>
                <td>{{ $mail->email }}</td>
                <td>{{ $mail->phone }}</td>
                <td>{{ $mail->subject }}</td>
                <td>
                    {{-- <a href="/dashboard/massages/{{ $massage->slug }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
                    {{-- <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> --}}

                    <form action="{{ route('mails.destroy', $mail->id) }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda Yakin Ingin Menghapus Data?')"><span data-feather="x-circle"></span></button>
                    </form>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $mails->links() }}
        </div>
      </div>
@endsection
