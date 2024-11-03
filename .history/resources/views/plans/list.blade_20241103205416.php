@extends('layouts.app')

@section('content')
<!-- Page Sidebar End -->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Plans</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item">Data Tables</li>
                        <li class="breadcrumb-item active">Basic DataTables</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>Subscription Plans</h3>
                        <button class="btn btn-secondary px-xl-2 px-xxl-3 float-end" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#planModal">Add Plan</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Discount Date</th>
                                        <th>Number of Appointments</th>
                                        <th>AI Bot</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>1 Month</td>
                                        <td>$320.00</td>
                                        <td>10%</td>
                                        <td>2024-12-31</td>
                                        <td>5</td>
                                        <td>Yes</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"><a href="#" class="edit-plan" data-bs-toggle="modal" data-bs-target="#planModal" data-plan='{"name": "Tiger Nixon", "duration": "1 Month", "price": "320.00", "discount": "10%", "discount_date": "2024-12-31", "number_appointments": "5", "ai_bot": "Yes"}'><i class="icon-pencil-alt"></i></a></li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <!-- Additional rows can be added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<!-- Modal Structure -->
<div class="modal fade" id="planModal" tabindex="-1" role="dialog" aria-labelledby="planModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="planModalLabel">Plan Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="planForm">
                    <div class="mb-3">
                        <label for="plan_name" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" id="plan_name" placeholder="Enter plan name" />
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" placeholder="Enter duration" />
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter price" />
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" class="form-control" id="discount" placeholder="Enter discount" />
                    </div>
                    <div class="mb-3">
                        <label for="discount_date" class="form-label">Discount Date</label>
                        <input type="date" class="form-control" id="discount_date" />
                    </div>
                    <div class="mb-3">
                        <label for="number_appointments" class="form-label">Number of Appointments</label>
                        <input type="text" class="form-control" id="number_appointments" placeholder="Enter number of appointments" />
                    </div>
                    <div class="mb-3">
                        <label for="ai_bot" class="form-label">AI Bot</label>
                        <input type="text" class="form-control" id="ai_bot" placeholder="Enter AI bot information" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#basic-1').DataTable();

        // Fill modal fields when edit button is clicked
        $('.edit-plan').on('click', function () {
            const plan = $(this).data('plan');
            $('#plan_name').val(plan.name);
            $('#duration').val(plan.duration);
            $('#price').val(plan.price);
            $('#discount').val(plan.discount);
            $('#discount_date').val(plan.discount_date);
            $('#number_appointments').val(plan.number_appointments);
            $('#ai_bot').val(plan.ai_bot);
        });

        // Save changes button click
        $('#saveChanges').on('click', function () {
            // Handle form submission logic here
            alert('Changes Saved!');
            $('#planModal').modal('hide');
            $('#planForm')[0].reset(); // Reset the form fields
        });
    });
</script>
@endsection
