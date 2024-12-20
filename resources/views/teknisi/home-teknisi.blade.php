<x-layoutt>

          <!-- /.col (left) -->
          <div class="col-md-12">
            <h1>Welcome back {{ $user }}</h1>
            <ul>
                <li><form action="logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                    </form>
                </li>
            </ul>


            <!-- /.card -->
          </div>
          <!-- /.col (right) -->





</x-layoutt>
