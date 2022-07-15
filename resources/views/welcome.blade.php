<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


        <div class="border">
            <h1>Input Form</h1>

            <div class="row mb-3" style="display: flex; margin-left: 30px;">
                <form>
                    <div class="row align-items-center g-3">
                        <div class="col-auto">
                            <label class="visually-hidden" for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
            <div style="display: flex; margin-left: 30px;">
                <div class="row mb-6">
                    <div class="col-sm-100">
                        <select class="form-select"
                            onchange="window.location.href=this.options[this.selectedIndex].value;">
                            <option>Select a Product or item</option>
                            @foreach ($products as $product)
                                <option value="{{ route('addToCart', $product->id) }}">
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3" style="margin-left: 300px;">
                    <div class="col-sm-100">
                        <select class="form-select">
                            <option>Select a Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3" style="margin-left: 300px; display: flex">
                    <div class="md-form md-outline input-with-post-icon datepicker" id="accLabels">
                        <p>Date: <input type="text" id="datepicker"></p>
                    </div>
                </div>
            </div>


            <div class="table-responsive">
                @php $total = 0 @endphp
                @foreach ((array) session('cart') as $id => $details)
                    @php $total += $details['rate'] * $details['qty'] @endphp
                @endforeach
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Rate</th>
                            <th>QTY</th>
                            <th>Total Amount</th>
                            <th>Discount (Amt)</th>
                            <th>Net Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <tr data-id="{{ $id }}">
                                    <td>{{ $details['name'] }}</td>
                                    <td>{{ $details['rate'] }}</td>
                                    <td data-th="Quantity">
                                        <input type="number" value="{{ $details['qty'] }}"
                                            class="form-control quantity update-cart" />
                                    </td>
                                    <td> {{ $details['rate'] * $details['qty'] }}
                                    </td>
                                    <td>{{ $details['discount'] }}</td>
                                    <td>{{ $details['rate'] * $details['qty'] - $details['discount'] }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="row border-b-2 brc-default-l2"></div>
            <div class="row mt-3">
                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                    Extra note such as company or payment information...
                </div>

                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                    <div class="row my-2">
                        <div class="col-7 text-right">Net Total </div>
                        <div class="col-5">
                            <span class="text-120 text-secondary-d1">{{ $total }}</span>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-7 text-right">Discount Total</div>
                        <div class="col-5">
                            <span class="text-110 text-secondary-d1">{{ $total }}</span>
                        </div>
                    </div>

                    <div class="row my-2 ">
                        <div class="col-7 text-right">Paid Amount</div>
                        <div class="col-5">
                            <span class="text-110 text-secondary-d1">{{ $total }}</span>
                        </div>
                    </div>
                    <div class="row my-2 ">
                        <div class="col-7 text-right">Due Amount</div>
                        <div class="col-5">
                            <span class="text-110 text-secondary-d1">{{ $total }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>

    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('updateCart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    qty: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    console.log('success')
                }
            });
        });
    </script>
</body>

</html>
