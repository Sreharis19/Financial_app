
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div style="float: right;">
                            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Cw_Post_List';" class="btn btn-primary">
                                <span class="tf-icons bx bx-arrow-back">
                                </span>&nbsp; Back To Post's List
                            </button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
                            <div class="col-xl-10" style="padding-top: 30px; padding-left: 80px; padding-right: 80px;">
                                <!-- HTML5 Inputs -->
                                <div class="card mb-4">
                                    <h5 class="card-header">Update Post</h5>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="first_name" class="col-md-2 col-form-label">Title :</label>
                                            <div class="col-md-07">
                                                <input class="form-control" value="Truesury Bond" type="text" id="first_name" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="email" class="col-md-2 col-form-label">Product Category : </label>
                                            <div class="col-md-07">
                                                <select id="choices-multiple-remove-button"
                                                    placeholder="Select products">
                                                    <option value="Stocks" onclick="filterSelection('Stocks')">Stocks
                                                    </option>
                                                    <option value="Equity">Equity</option>
                                                    <option selected value="Bonds">Bonds</option>
                                                    <option value="RA">RA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="pc_image" class="form-label">Content Image :</label>
                                            <div class="col-md-6 col-lg-4 mb-3">
                                                <div class="card h-100">
                                                  <div class="card-body">
                                                    <h5 class="card-title">Image Preview</h5>
                                                  </div>
                                                  <img class="img-fluid" src="https://media.istockphoto.com/id/1255522240/photo/bonds-the-word-on-wooden-cubes-cubes-stand-on-a-reflective-surface-in-the-background-is-a.jpg?s=612x612&w=0&k=20&c=XkuYsljt9whEl6yRkkDGxNwxGdM9i3Kg64w7LAz0_gI=" alt="Card image cap" />
                                                </div>
                                              </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="pc_image" class="form-label">Content Image :</label>
                                            <div class="col-md-07">
                                            <input class="form-control" type="file" id="pc_image" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="pc_image" class="form-label">Content :</label>
                                            <div class="col-md-07">
                                           <textarea cols="100" rows="18"> The yield on the UK’s 10-year Gilt held slightly above 3.3% after touching 2.996% on February 2nd, its lowest level since November 24th, as investors digested Britain's fourth-quarter GDP data. The UK economy flatlined in the fourth quarter of 2022, in line with expectations and narrowly avoiding a recession. However, monthly GDP data for December alone, a month marked by widespread rail strikes and bad weather, showed that the economy shrank 0.5%, more than the 0.3% expected by markets. The Bank of England has raised interest rates by 50bps at the beginning of the month but dropped its pledge to keep increasing them "forcefully" if needed and said inflation had probably peaked, while projecting a much shallower contraction than previously estimated.</textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div style="float: right;">
                                            <button type="button" onclick="location.href = 'fa_list.html';"
                                                class="btn btn-dark">
                                                <span class="tf-icons bx bx-save">
                                                </span>&nbsp; Update Post
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->