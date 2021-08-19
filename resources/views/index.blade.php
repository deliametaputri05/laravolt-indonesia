<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <form>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Province</label>

            <div class="col-md-6">
                <select name="province" id="province" class="form-control">
                    <option value="">== Select Province ==</option>
                    @foreach ($provinces as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">City</label>

            <div class="col-md-6">
                <select name="city" id="city" class="form-control">
                    <option value="">== Select City ==</option>

                </select>
            </div>
        </div>
    </form>
</body>

</html>



<script>
    function test() {

        $('#province').on('change', function() {
            var id = $(this).val()

            $.post("/dropdown", {
                id: id,
                _token: "{{ csrf_token() }}"
            }).done(function(data) {
                $('#city').empty();
                $.each(data, function(id, name) {
                    $('#city').append(new Option(name, id))
                })
            });
        })
    }

    test()
</script>