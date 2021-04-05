<?php
/* Smarty version 3.1.39, created on 2021-04-05 18:28:31
  from 'C:\wamp64\www\repositories\LoginManager\templates\activation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_606b56cf7e9c51_25976758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc191bc360dd82fd078e78b9f3302bce73d5e7c9' => 
    array (
      0 => 'C:\\wamp64\\www\\repositories\\LoginManager\\templates\\activation.tpl',
      1 => 1617620324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_606b56cf7e9c51_25976758 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-12 mt-5">
        <div class="card card-chart">
            <div class="card-header">
                <i class="fas fa-user-circle"></i></i>&nbsp;&nbsp;<strong class="login-title">Activate Your Account</strong>
            </div>
            <div class="card-body justify-content-center">
				<form method="post" action="?activity=activate">
					<div class="row form-group justify-content-center">
						<input type="text" name="email" id="useractivation" tabindex="3" class="form-control" placeholder="Enter email address and click activate." value="" autocomplete="off">
					</div>
					<div class="row form-group justify-content-center">
						<input type="text" name="authCode" id="activationcode" tabindex="4" class="form-control"
							<?php if ((isset($_smarty_tpl->tpl_vars['templateData']->value['authCode']))) {?> value="<?php echo $_smarty_tpl->tpl_vars['templateData']->value['authCode'];?>
"<?php }?>
							placeholder="Activation code" autocomplete="off">
					</div>
					<div class="row form-group justify-content-center">
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								<input type="button" name="activate-submit" id="activate-submit" tabindex="4" class="btn btn-register text-muted font-weight-bold" value="Activate">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
