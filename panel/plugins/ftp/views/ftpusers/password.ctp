<?php
/*Panel-GZW is a web hosting panel for Unix/Linux platforms.
Copyright (C) 2005 - 2011  GoldZone Web - gaetan.trellu@goldzoneweb.info

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * Display the FTP options.
 */
echo $this->element('ftp');
?>

<div id="content">
	<div class="main">
		<div class="image"><?php echo $html->image('/ftp/img/options/ftpusers/password_full.png', array('alt' => 'Password')); ?></div>
		<div class="name"><?php __d('ftp', 'Change FTP user password.'); ?>
			<div class="infos">
				<?php __d('ftp', 'This change affects only the password of FTP user selected. <br />
								A good password is a password that contains letters, numbers, uppercase'
						);
				?>
			</div>
		</div>
		<div class="main_display">

			<?php
				/**
				 * Display messages.
				 */
				echo $session->flash();
			
				/**
				 * Create the "FTP" form.
				 */
				echo $form->create('Ftpuser', array('action' => 'password'));

				/**
				 * This field is very important for an edit.
				 * He said which ftp is edited.
				 */
				echo $form->input('Ftpuser.id');
			?>

			<p class="warning"><?php __d('ftp', 'Never give your password to an another person.'); ?></p>
			<table>
				<tr>
					<td class="form_part1"><?php __d('ftp', 'New FTP user password'); ?></td>
					<td class="form_part2"><?php echo $form->input('Ftpuser.password', array('label' => false, 'type' => 'password', 'value' => false, 'size' => '31', 'after' => '<span class="highlight">&nbsp;' . __d('ftp', '8 chars minimum', true) . '</span>')); ?></td>
				</tr>
				<tr>
					<td class="form_part1"><?php __d('ftp', 'Confirm FTP user password'); ?></td>
					<td class="form_part2"><?php echo $form->input('confirmPassword', array('label' => false, 'type' => 'password', 'size' => '31')); ?></td>
				</tr>
			</table>

			<?php echo $form->end(__d('ftp', 'Change the FTP user password', true));?>

			<div class="advice">
				<?php echo $html->image('/img/main/advice.png', array('alt' => 'Advice')); ?>
				<?php __d('ftp', 'Check that the locking is not capitalized on.'); ?>
			</div>

		</div>
	</div>
</div>
