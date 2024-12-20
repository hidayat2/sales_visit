<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
          <!-- /.col (left) -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Visit Edit</h3>
              </div>

              <form action="{{ route('salesvisits.update', $visit->id) }}" method="POST">
                @method('PUT')
                @csrf
              <div class="card-body">
                <!-- Date -->
                <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                  <label>Date:</label>
                  <input type="date" name="visit_date" class="form-control" value="{{ $visit->visit_date }}" required><br><br>

                </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                      <label>Client</label>


                      <select class="form-control select2" style="width: 100%;" name="company_name" required>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $visit->company_id== $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select><br><br>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                      <label>Status</label>


                      <select class="form-control select2" style="width: 100%;" name="status" required>
                        @foreach ($status as $statu)
                            <option value="{{ $statu->id }}" {{ $visit->statu_id== $statu->id ? 'selected' : '' }}>
                                {{ $statu->name }}
                            </option>
                        @endforeach
                    </select><br><br>
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
                    <div class="col-md-12">
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea name="description" class="form-control @error('title') is-invalid @enderror" rows="3" placeholder="Enter ..."  value="">{{ $visit->description }}</textarea>
                    </div>
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
