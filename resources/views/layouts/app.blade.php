<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <style>
        body {
            background: url('https://media.istockphoto.com/id/835813380/vector/abstract-gear-wheel-mechanism-background-machine-technology-vector-illustration.jpg?s=612x612&w=0&k=20&c=7ipGpGQTw5G6-c3uTK_pC02OPzIM5Ex0bYlZkb9wR1o=');
        }
        h1{
            color:red;
        }
        input, textarea{
            /* width: 100%; */
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 20px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(0, 128, 0, 0.3);
            outline: none;
        }

    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
