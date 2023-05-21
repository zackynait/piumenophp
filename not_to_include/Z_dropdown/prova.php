<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">

  <!-- START Dropdown: Group by -->
  <div class="card shadow-sm w-25">
    <div class="card-body">
      
      <div class="small text-muted mb-3">Group by</div>
      
      <!-- START Group 1 -->
      <div class="mb-2">
        <div class="btn-group" role="group" aria-label="Basic example">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-a fa-fw me-1"></i> Title <i class="fa-solid fa-angle-down ms-2"></i>
            </button>
            <ul class="dropdown-menu shadow-sm">
              <li><h6 class="dropdown-header">Group by</h6></li>
              <li><a class="dropdown-item active" href="#"><i class="fa fa-a fa-fw me-1"></i> Title</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa fa-clock fa-fw me-1"></i> Status</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa fa-list fa-fw me-1"></i> Priority</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa fa-tag fa-fw me-1"></i> Tags</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-fw me-1"></i> Assignee</a></li>
            </ul>
          </div>

          <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-secondary rounded-end" data-bs-toggle="dropdown" aria-expanded="false">
              A <i class="fa fa-arrow-right fa-fw mx-1"></i> Z <i class="fa-solid fa-angle-down ms-2"></i>
            </button>
            <ul class="dropdown-menu shadow-sm">
              <li><h6 class="dropdown-header">Sort</h6></li>
              <li>
                <a class="dropdown-item active" href="#">
                  A <i class="fa fa-arrow-right fa-fw mx-1"></i> Z 
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  Z <i class="fa fa-arrow-left fa-fw mx-1"></i> A 
                </a>
              </li>
            </ul>
          </div>

        </div>

        <button type="button" class="btn btn-link text-muted">
          <i class="fa fa-close fa-fw" data-bs-toggle="tooltip" data-bs-title="Remove Group" data-bs-placement="right"></i>
        </button>

      </div>
      <!-- END Group 1 -->
     
      <!-- START Add Next Group -->
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-link text-decoration-none text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-plus fa-fw me-1 "></i> Add Next Group
        </button>
        <ul class="dropdown-menu shadow-sm">
          <li><h6 class="dropdown-header">Add Next Group</h6></li>
          <li><a class="dropdown-item" href="#"><i class="fa fa-clock fa-fw me-1"></i> Status</a></li>
          <li><a class="dropdown-item" href="#"><i class="fa fa-list fa-fw me-1"></i> Priority</a></li>
          <li><a class="dropdown-item" href="#"><i class="fa fa-tag fa-fw me-1"></i> Tags</a></li>
          <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-fw me-1"></i> Assignee</a></li>
        </ul>
      </div>
      <!-- END Add Next Group -->
      
    </div>
    <div class="card-footer py-3 border-top-0 d-flex justify-content-end">
      <button type="button" class="btn btn-link text-dark text-decoration-none px-3">Reset</button>
      <button type="button" class="btn btn-primary px-3">Apply</button>
    </div>
  </div>
  <!-- END Dropdown: Group by -->
  
</div>