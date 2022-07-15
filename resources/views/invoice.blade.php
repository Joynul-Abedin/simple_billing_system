<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>company invoice - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="page-content container">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Invoice
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    ID: #111-222
                </small>
            </h1>

            <div class="page-tools">
                <div class="action-buttons">
                    <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i> Print
                    </a>
                    <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                        <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i> Export
                    </a>
                </div>
            </div>
        </div>

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
                    <select class="form-select" onchange="window.location.href=this.options[this.selectedIndex].value;">
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


        <div class="container px-0">
            <div class="row mt-4">

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">Name</div>
                        <div class="col-9 col-sm-5">Rate</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">QTY</div>
                        <div class="d-none d-sm-block col-sm-2">Total Amount</div>
                        <div class="col-2">Discount (Amt)</div>
                        <div class="col-2">Net Amount</div>
                    </div>

                    <div class="text-95 text-secondary-d3">

                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                {{-- <tr data-id="{{ $id }}">
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
                                </tr> --}}
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">{{ $details['name'] }}</div>
                                    <div class="col-9 col-sm-5">{{ $details['rate'] }}</div>
                                    <div class="d-none d-sm-block col-2"> <input type="number"
                                            value="{{ $details['qty'] }}" class="form-control quantity update-cart" />
                                    </div>
                                    <div class="d-none d-sm-block col-2 text-95">
                                        {{ $details['rate'] * $details['qty'] }}</div>
                                    <div class="col-2 text-secondary-d2">{{ $details['discount'] }}</div>
                                    <div class="col-2 text-secondary-d2">
                                        {{ $details['rate'] * $details['qty'] - $details['discount'] }}</div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Extra note such as company or payment information...
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">SubTotal</div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1">$2,250</span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">Tax (10%)</div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">$225</span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">Total Amount</div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">$2,475</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>
                        <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <style type="text/css">
        body {
            margin-top: 20px;
            color: #484b51;
        }

        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: 0.5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -0.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -0.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: 0.75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: 0.75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(121, 169, 197, 0.92) !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #4087d4 !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            color: #68a3d5 !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script type="text/javascript"></script>
</body>

</html>
