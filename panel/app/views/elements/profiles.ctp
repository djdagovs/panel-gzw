<?php
/*Panel-GZW is a web hosting panel for Unix/Linux platforms.
Copyright (C) 2005 - 2009  Gaëtan Trellu - goldyfruit@free.fr

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
?>
<div id="options">
	<div class="title"><i>&gt;&gt; <?php __d('core', 'Profiles management'); ?></i></div>
	<div class="menu_links">
		<table>
			<tr>
				<td>
					<dl class="links_option">
						<dt><?php echo $html->image('options/profile/add_profile.png', array('alt' => 'Profile')); ?></dt>
						<dd><?php echo $html->link(__d('core', 'Profiles' ,true), array('controller' => 'profiles', 'action' => 'index')); ?></dd>
					</dl>
				</td>
			</tr>
		</table>
	</div>
</div>