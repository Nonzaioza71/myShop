<div id="loading_screen" class="fixed-top h-100 w-100">
    <div class="fixed-top h-100 w-100 border-end d-flex justify-content-between">
        <div id="bg_right" class="position-fixed animate__animated bg-dark h-100 w-50 border-start end-0 border-info"></div>
        <div id="bg_left" class="position-fixed animate__animated bg-dark h-100 w-50 border-end border-info">

            <div id="loadBody" class="d-block">
                <div id="spinner" class="spinner-border text-info fixed-top bottom-50 m-auto" style="width: 30.25vw; height: 30.25vw; top: 50vh;"></div>
    
                <div id="card" class="text-info fixed-top bottom-50 me-auto w-100 text-center d-flex align-items-center animate__animated" style="top: 50vh; left:calc(100% - 65%);">
                    <div class="card shadow rounded-circle d-flex align-items-center bg-dark border-info" style="width: 30vw; height: 30vw;">
                        <div class="m-auto">
                            <h1 class="text-center" style="font-size: 5vw;">Loading</h1>
                            <div class="d-flex justify-content-center">
                                <!-- <hr class="fw-bold border border-5 rounded-5 text-info border-info" style="width: 15vw;"> -->
                            </div>
                            <button onclick="loadSuccess(false)" class="btn btn-danger m-auto mt-4 w-100">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>