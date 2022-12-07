<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LogList</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        input[type='date']::-webkit-calendar-picker-indicator {
            font-size: 2em;
            position: absolute;

        }

        input[type='time']::-webkit-calendar-picker-indicator {
            font-size: 2em;

        }

        input[type='date']::-webkit-datetime-edit {
            text-align: center;
        }

        input[type='date']:focus {
            outline: none;
        }

        input[type='time']:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <div style="width:100%;height:8vh;display:flex;justify-content:space-between;background-color:#34495E;">
        <div style="width:90%;">
            <form action={{ route('export') }} method="post"
                style="display: flex;width:100%;height:100%;justify-content:space-between;align-items:center;">
                @csrf
                <div class="mx-3" style="background-color:#fff;width:45%;height:90%;border-radius:10px;display:flex;">
                    <div style="width:60%;height:100%;padding-right:20px;padding-left:10px;position:relative;">
                        <input type="date" name="param1" value={{ \Carbon\Carbon::now()->subMonth() }}
                            style="width: 100%;height:100%;border:1px solid #fff;" />
                    </div>
                    <div style="width:40%;height:100%;padding-right:20px;padding-left:10px;position:relative;">
                        <input type="time" step="2" name="time1" value="00:00:00"
                            style="width: 100%;height:100%;border:1px solid #fff;" />
                    </div>
                </div>
                <div class="mx-3" style="background-color:#fff;width:45%;height:90%;border-radius:10px;display:flex;">
                    <div style="width:100%;height:100%;padding-right:20px;padding-left:10px;position:relative;">
                        <input type="date" name="param2" value={{ \Carbon\Carbon::now() }}
                            style="width: 100%;height:100%;border:1px solid #fff;" />
                    </div>
                    <div style="width:40%;height:100%;padding-right:20px;padding-left:10px;position:relative;">
                        <input type="time" step="2" name="time2" value="00:00:00"
                            style="width: 100%;height:100%;border:1px solid #fff;" />
                    </div>
                </div>
                <div class="mx-2" style="width:12%;height:87%;"><button
                        style="width:100%;height:100%;font-size:1.5em;" type="submit"
                        class="btn btn-primary">Export</button></div>
            </form>
        </div>
        <div style="width:10%;display:flex;align-items:center;">
            <a class="btn btn-danger" href="{{ route('log') }}"
                style="height: 87%;width:95%;display:flex;align-items:center;justify-content:center;font-size:1.5em;">
                Logout
            </a>
        </div>
    </div>
    <div style="width:100%;height:10vh;display:flex;justify-content:center;align-items:center;">
        <form action="{{ route('filterbyday') }}" method="GET" style="width:40%;height:60%;display: flex;">
            <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="day"
                style="width:50%;">
                <option>First Page</option>
                @foreach ($filter_days_box as $item)
                    <a>
                        <option value="{{ $item }}">{{ $item }}</option>
                    </a>
                @endforeach
            </select>
            <div style="height:100%;width:50%;" class="mx-2">
                <button style="height:100%;width:100%;" type="submit" class="btn btn-outline-primary">Filter List By Day</button>
            </div>
        </form>
    </div>
    <div class="mx-5 my-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">ip address</th>
                    <th scope="col">Request</th>
                    <th scope="col">DataBase ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    {{-- <th scope="col">Response</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{ $item->IP }}</td>
                        <td>{{ $item->requestName }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->created_at->format('m-d-Y h:i:s a') }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="width:100%;h-[50px];display:flex;justify-content:center;aling-items:center;margin-top:7px;">
        <div style="width: 100%;display: flex;justify-content: center;align-items: center;">
            <div style="flex:1;display: flex;justify-content: end;height: 100%;align-items: center;margin-top: 10px;">{{ $records->links('pagination::bootstrap-4') }}</div>
        <div style="flex:1;display: flex;justify-content:end;margin-right: 7vw;">Page {{ $records->currentPage()  }} of {{ $records->lastPage() }} &nbsp;(total Request : {{ $total_id }}) </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
