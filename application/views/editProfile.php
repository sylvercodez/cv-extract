<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="mypanel cv-form">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h1>Edit Profile</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>user/saveprofile" method="post" enctype="multipart/form-data">
                    <div class="panel panel-widget">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Your Name" value="<?php echo $user->name; ?>" required="required" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Your Email" value="<?php echo $user->email; ?>" required="required" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="radio" name="gender" id="gender" value="Male" <?php echo $user->gender=='Male'?'checked="checked"':''; ?> /> Male
                                        <input type="radio" name="gender" id="gender" value="Female" <?php echo $user->gender=='Female'?'checked="checked"':''; ?> /> Female
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="age" id="age" class="form-control input-lg" placeholder="Age" value="<?= $user->age ? $user->age : ''; ?>" required="required" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="city" id="city" class="form-control input-lg" placeholder="Your city" value="<?php echo $user->city; ?>" required="required" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="country" id="country" class="form-control input-lg" placeholder="Your Country" value="<?php echo $user->country; ?>" required="required" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" name="image" id="image" class="form-control input-lg" />
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Your Password" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>