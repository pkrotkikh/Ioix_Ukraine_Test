@extends('layouts/layout')

@section('title', __("product.title.list"))

@section('vendorStyles') @endsection

@section('pageStyles')
    <link rel="stylesheet" href="{{asset("custom/css/app-products-list.css")}}">
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" class="form-control" id="product_name" placeholder="{{__("locale.product.model.name")}}">
                        </div>

                        <div class="col-3">
                            <select class="form-control" name="product_category_id" id="product_category_id">
                                <option id="product_category_id_default" value="">{{__("locale.product.model.category")}}</option>
                                @foreach($productCategories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <label class="is_active_label" for="is_active_checkbox">{{__("locale.product.model.is_active")}}:</label>
                            <input type="checkbox" class="form-check-input product_checkbox" id="is_active_checkbox">
                        </div>

                        <div class="col-3">
                            <input type="submit" id="submit_search" class="btn btn-primary search-input" value="{{__("locale.form.search")}}">
                            <input type="submit" id="reset_search" class="btn btn-secondary search-input mt-2" value="{{__("locale.form.reset")}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row mt-4">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card">
                <div class="card-body datatable-card">
                    <table class="table table-bordered data-table" id="datatable">
                        <thead>
                            <tr>
                                <th>{{__("locale.product.table.number")}}</th>
                                <th>{{__("locale.product.table.name")}}</th>
                                <th>{{__("locale.product.table.category")}}</th>
                                <th>{{__("locale.product.table.is_active")}}</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>

@endsection

@section("vendorScripts") @endsection

@section("pageScripts")
<script>
$( document ).ready(function() {
    var locale = $('html').attr('lang');
    var translateURL = "//cdn.datatables.net/plug-ins/1.11.2/i18n/en-gb.json";

    if (locale === "ru") {
        translateURL = "//cdn.datatables.net/plug-ins/1.11.2/i18n/ru.json";
    }

    if (locale === "ua") {
        translateURL = "//cdn.datatables.net/plug-ins/1.11.2/i18n/uk.json";
    }

    var assetPath = $('body').attr('data-asset-path');

    var product_name = "";
    var product_category_id = "";
    var is_active = "";
    var to_search = 0;

    var table = $('#datatable').DataTable({
        language: {
            url: translateURL
        },
        ajax: {
            url: assetPath + "api/products/data_table",
            type: 'POST',
            data: function () {
                return {
                    "search": to_search,
                    "product_name": product_name,
                    "product_category_id": product_category_id,
                    "is_active": is_active,
                };
            }
        },
        columns: [
            {data: 'DT_RowIndex', searchable: false},
            {data: 'product_name'},
            {data: 'product_category_name'},
            {data: 'is_active' }
        ],
    });

    $("#submit_search").on("click", function (){
        to_search = 1;
        product_name = $("#product_name").val();
        product_category_id = $("#product_category_id").val();
        is_active = $("#is_active_checkbox").is(":checked") == true ? 1 : 0;

        table.ajax.reload();
    })

    $("#reset_search").on("click", function (){
        to_search = 0;
        product_name = "";
        product_category_id = "";
        is_active = "0";

        reset_selection();

        table.ajax.reload();
    })

    function reset_selection () {
        $("#product_name").val("");
        $("#product_category_id").val($("#product_category_id_default").val());
        $("#is_active_checkbox").prop( "checked", false );
    }
})
</script>
@endsection
