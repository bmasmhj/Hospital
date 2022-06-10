<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                    <li class="nav-item">
                        <a href="#appoitments" onclick="appoitments()" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                            <span class="d-none d-md-block">Appointments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#bookingdetails" onclick="bookingdetails()" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 ">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Booked Packages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#recordetail" onclick="recordetail()" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                            <span class="d-none d-md-block">Medical Reports</span>
                        </a>
                    </li>
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane  show active" id="appoitments">
                        <div class="d-flex align-items-center">
                            <strong>Loading...</strong>
                            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                        </div>
                    </div>
                    <div class="tab-pane" id="bookingdetails">
                        <div class="d-flex align-items-center">
                            <strong>Loading...</strong>
                            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                        </div>
                    </div>
                    <div class="tab-pane" id="recordetail">
                            <div class="d-flex align-items-center">
                                <strong>Loading...</strong>
                                <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                            </div>
                    </div>
                </div>                                          
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="displaymodel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="medicalreportimage">
                
            </div>
        </div>
    </div>
</div>

