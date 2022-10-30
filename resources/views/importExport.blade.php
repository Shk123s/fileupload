<html lang="en">  
<head>  
    <title>Import - Export Laravel 5</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >  
</head>  
<body>  
    <nav class="navbar navbar-default">  
        <div class="container-fluid">  
            <div class="navbar-header">  
                <a class="navbar-brand" href="#"> Laravel 5.4 - Import and Export CSV and Excel </a>  
            </div>  
        </div>  
    </nav>  
    <div class="container">  
        <a href="{{asset('upload/11.xlsx')}}"class="btn btn-success">Download Excel xls</a>
        <a href="{{asset('upload/Book3.csv')}}"class="btn btn-success">Download Excel csv</a>
        <a href="{{asset('upload/20221028_065718-Book2.xlsx')}}"class="btn btn-success">Download Excel xlsx</a>


        {{-- <a  href = "{{route('downloadExcelxls')}}" class="btn btn-success">Download Excel xls</a>  
        <a href="{{ URL::to('downloadExcelxlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>  
        <a href="{{ URL::to('downloadExcelcsv') }}"><button class="btn btn-success">Download CSV</button></a>   --}}
        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">  
            {{ csrf_field() }}
            <input type="file" name="import_file" style="padding-bottom: 12px"/>  
            <button class="btn btn-primary"  type="submit">Import File</button>  
        </form>  
    </div>  
</body>  
</html>  