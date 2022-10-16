<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
    <script>
        window.onload = function() {
            var id = document.getElementById('id')
            var content = document.getElementById('content')
            var result = document.getElementById('result')
        };


        function view() {
            axios.get('/api/post/' + id.value, {
                'id': id.value
            }).catch(function(error) {
                alert(error.response.data.message)
            }).then(function(response) {
                result.innerHTML = JSON.stringify(response.data)
            })
        }

        function store() {
            axios.post('/api/post', {
                'content': content.value
            }).catch(function(error) {
                alert(error.response.data.message)
            }).then(function(response) {
                result.innerHTML = JSON.stringify(response.data)
            })
        }

        function update() {
            axios.post('/api/post/' + id.value, {
                '_method': 'put',
                'id': id.value,
                'content': content.value
            }).catch(function(error) {
                alert(error.response.data.message)
            }).then(function(response) {
                result.innerHTML = JSON.stringify(response.data)
            })
        }

        function destory() {
            axios.post('/api/post/' + id.value, {
                'id': id.value,
                '_method': 'delete',
            }).catch(function(error) {
                alert(error.response.data.message)
            }).then(function(response) {
                result.innerHTML = JSON.stringify(response.data)
            })
        }
    </script>

</head>

<body>
    <label>id:</label>
    <input type="text" name="id" id="id">
    <label>內容:</label>
    <input type="text" name="content" id="content">
    <button type="button" onclick="store()">新增</button>
    <button type="button" onclick="update()">修改</button>
    <button type="button" onclick="destory()">刪除</button>
    <button type="button" onclick="view()">查詢</button>
    <label id="result"></label>
</body>


</html>
