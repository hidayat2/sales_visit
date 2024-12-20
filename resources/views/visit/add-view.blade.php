<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
          <!-- /.col (left) -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Visit Input</h3>
              </div>
              <form action="{{ route('salesvisits.store') }}" method="post">
                @csrf
              <div class="card-body">
                <!-- Date -->
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="visit_date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label>Client</label>
                      <select class="form-control select2" style="width: 100%;" name="company_name" required>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select><br><br>


                    </div>
                </div>
              </div>

                <!-- Date range -->
                        {{-- <div class="form-group">
                        <label>Date range:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation">
                        </div>
                        <!-- /.input group -->
                        </div> --}}
                <!-- /.form group -->


                    <!-- textarea -->
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>


                    <div class="card-footer">
                        <a href="javascript:window.history.go(-1);" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>

                <!-- /.form group -->
              </div>
                    {{-- <div class="card-footer">
                    Visit <a href="https://getdatepicker.com/5-4/">tempusdominus </a> for more examples and information about
                    the plugin.
                    </div> --}}
              <!-- /.card-body -->
            </div>
            <!-- /.card -->




            <!-- /.card -->
          </div>
          <!-- /.col (right) -->





</x-layout>
