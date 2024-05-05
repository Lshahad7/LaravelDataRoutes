<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="container mt-5">
        <h1 class="text-center">Import data usnig Excel File</h1>
    </div>
    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-3 mx-2 my-2">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title text-center">Import Students</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('importStudent') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file mb-2" id="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Import Students</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mx-2 my-2">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title text-center">Import Term</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('importTerm') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file mb-2" id="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Import Term</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mx-2 my-2">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title text-center">Import Courses</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('importCourse') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file mb-2" id="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Import Courses</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mx-2 my-2">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title text-center">Import Student Term</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('importStudentTerm') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file mb-2" id="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Import Student Term</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mx-2 my-2">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title text-center">Import Student Term Course</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('importStudentTermCourse') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control-file mb-2" id="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Import Student Term Courses</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>