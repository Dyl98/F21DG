# php/core

## changePwd.php
include_once('protect.php') \
include_once('engine.php') \
Also uses a whole bunch of js </br>
&ensp; '../../js/mail_system.js' \
&ensp; '../modules/staff-members' \
&ensp; 'logout.php' \
include_once('../ui-layout/footer.inc')

## config.php
Also uses '../../index.php'

## engine.php
require_once('mysql.php') \
require_once('config.php')

## helpSys.php
include_once('protect.php') \
include_once('engine.php') \
Also uses 'js/helpingsystem/script.js'

## logout.php
NULL?

## mailSys.php
include_once('protect.php') \
include_once('engine.php') \
Also uses 'js/helpingsystem/script.js'

## mysql.php
NULL?

## protect.php
include_once('config.php')


# php/modules/research-duties

## add-form-xref.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## add-form.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses '../research-duties/' <- redirects to main page

## add.inc.php
include_once('../../core/protect.php') \
Also uses '../research-duties/' <- redirects to main page </br>
&ensp; '../../core/logout.php'

## add.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('add.inc.php') \
include_once('../../ui-layout/footer.inc')

## controller.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') </br>
Also uses 'add-form.php' \
&ensp; 'edit-form.php' \
&ensp; 'add-form-xref.php'

## edit-form.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses '../research-duties/' <- redirects to main page

## edit.inc.php
Also uses '../research-duties/' <- redirects to main page </br>
&ensp; '../../core/logout.php' \
&ensp; 'remove.php' \
&ensp; '../staff-members/edit.php' \
&ensp; '../graphs-and-charts/research-pie.php'

## edit.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('edit.inc.php') \
include_once('../../ui-layout/footer.inc')

## index.filtered.inc.php
require_once('controller.php') \
include_once('../../core/protect.php')

## index.inc.php
include_once('../../core/protect.php') \
Also uses '../../core/logout.php' </br>
&ensp; 'add.php'

## index.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('index.inc.php') \
include_once('../../ui-layout/footer.inc')

## index.unfiltered.inc.php
require_once('controller.php') \
include_once('../../core/protect.php')

## remove-xref.php
require_once('controller.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## remove.php
include_once('../../core/protect.php') \
include_once('controller.php') \
Also uses '../research-duties/' <- redirects to main page \
include_once('../../ui-layout/header.inc') \
Also uses '../../core/logout.php' </br>
&ensp; '../staff-members/edit.php' \
include_once('../../ui-layout/footer.inc')


# php/modules/graphs-and-charts/

## admin-pie.php
include_once('pChart/pChart/pData.class') \
include_once('pChart/pChart/pChart.class') \
include_once('../../core/protect.php') \
include_once('../../core/engine.php')

## controller.php
require_once('../../core/engine.php')

## index.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
Also uses '../../core/logout.php' \
include_once('../../ui-layout/footer.inc')

## module-pie.php
include_once('pChart/pChart/pData.class') \
include_once('pChart/pChart/pChart.class') \
include_once('../../core/protect.php') \
include_once('../../core/engine.php')

## research-pie.php
include_once('pChart/pChart/pData.class') \
include_once('pChart/pChart/pChart.class') \
include_once('../../core/protect.php') \
include_once('../../core/engine.php')

## staff-bar-rotated.php
include_once('../../core/protect.php') \
require_once('../../core/config.php') \
Also uses 'php/modules/graphs-and-charts/staff-bar.php'

## staff-bar.php
include('pChart/pChart/pData.class') \
include('pChart/pChart/pChart.class') \
include_once('controller.php')

## staff-pie-controller.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php')

## staff-pie.php
include_once('pChart/pChart/pData.class') \
include_once('pChart/pChart/pChart.class') \
include_once('../../core/protect.php') \
include_once('staff-pie-controller.php')

## workload-graph.php
include_once('pChart/pChart/pData.class') \
include_once('pChart/pChart/pChart.class') \
include_once('../../core/protect.php') \
include_once('controller.php')


# php/modules/staff-members

## add-form-admin-tasks-xref.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## add-form-current-modules-xref.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## add-form-research-duties-xref.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## add-form.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses '../staff-members'

## add.inc.php
include_once('../../core/protect.php') \
Also uses '../staff-members' </br>
&ensp; '../../core/logout.php'

## add.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('add.inc.php') \
include_once('../../ui-layout/footer.inc')

## controller.php
require_once('../../core/engine.php') \
require_once('../../core/protect.php') \
Also uses '../graphs-and-charts/staff-bar-rotated.php' </br>
&ensp; 'add-form.php' \
&ensp; 'edit-form.php' \
&ensp; 'add-form-current-modules-xref.php' \
&ensp; 'add-form-admin-tasks-xref.php' \
&ensp; 'add-form-research-duties-xref.php' \
&ensp; 'remove-research-duties-xref.php'

## edit-form.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses '../staff-members'

## edit.inc.php
Also uses '../staff-members' </br>
&ensp; '../../core/logout.php' \
&ensp; 'remove.php' \
&ensp; '../graphs-and-charts/staff-pie.php' \
&ensp; '../current-modules/edit.php' \
&ensp; '../admin-tasks/edit.php' \
&ensp; '../research-duties/edit.php'

## edit.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('edit.inc.php') \
include_once('../../ui-layout/footer.inc')

## index.filtered.inc.php
require_once('controller.php') \
include_once('../../core/protect.php')

## index.inc.php
include_once('../../core/protect.php') \
Also uses '../../core/logout.php'

## index.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('index.inc.php') \
include_once('../../ui-layout/footer.inc')

## index.unfiltered.inc.php
require_once('controller.php') \
include_once('../../core/protect.php')

## remove-admin-tasks-xref.php
require_once('controller.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## remove-current-modules-xref.php
require_once('controller.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## remove-research-duties-xref.php
requrie_once('controller.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## remove.php
include_once('../../core/protect.php') \
include_once('controller.php') \
Also uses '../staff-members' \
include_once('../../ui-layout/header.inc') \
Also uses '../../core/logout.php' </br>
&ensp; '../current-modules/edit.php' \
&ensp; '../admin-tasks/edit.php' \
&ensp; '../research-duties/edit.php' \
include_once('../../ui-layout/footer.inc')


# php/modules/current-modules

## add-form-xref.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## add-form.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses '../current-modules/' <- redirects to main page

## add.inc.php
include_once('../../core/protect.php') \
Also uses '../current-modules/' <- redirects to main page </br>
&ensp; '../../core/logout.php'

## add.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('add.inc.php') \
include_once('../../ui-layout/footer.inc')

## controller.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses 'add-form.php' </br>
&ensp; 'edit-form.php' \
&ensp; 'add-form-xref.php'

## edit-form.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses '../current-modules/' <- redirects to main page

## edit.inc.php
Also uses '../current-modules/' <- redirects to main page </br>
&ensp; '../../core/logout.php' \
&ensp; 'remove.php' \
&ensp; '../staff-members/edit.php' \
&ensp; '../graphs-and-charts/research-pie.php'

## edit.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('edit.inc.php') \
include_once('../../ui-layout/footer.inc')

## index.filtered.inc.php
require_once('controller.php') \
include_once('../../core/protect.php')

## index.inc.php
include_once('../../core/protect.php') \
Also uses '../../core/logout.php' </br>
&ensp; 'add.php'

## index.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('index.inc.php') \
include_once('../../ui-layout/footer.inc')

## index.unfiltered.inc.php
require_once('controller.php') \
include_once('../../core/protect.php')

## remove-xref.php
require_once('controller.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## remove.php
include_once('../../core/protect.php') \
include_once('controller.php') \
Also uses '../current-modules/' <- redirects to main page \
include_once('../../ui-layout/header.inc') \
Also uses '../../core/logout.php' </br>
&ensp; '../staff-members/edit.php' \
include_once('../../ui-layout/footer.inc')


# php/modules/admin-tasks

## add-form-xref.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## add-form.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses '../admin-tasks/' <- redirects to main page

## add.inc.php
include_once('../../core/protect.php') \
Also uses '../admin-tasks/' <- redirects to main page </br>
&ensp; '../../core/logout.php'

## add.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('add.inc.php') \
include_once('../../ui-layout/footer.inc')

## controller.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses 'add-form.php' </br>
&ensp; 'edit-form.php' \
&ensp; 'add-form-xref.php'

## edit-form.php
require_once('../../core/engine.php') \
include_once('../../core/protect.php') \
Also uses '../admin-tasks/' <- redirects to main page

## edit.inc.php
Also uses '../admin-tasks/' <- redirects to main page </br>
&ensp; '../../core/logout.php' \
&ensp; 'remove.php' \
&ensp; '../staff-members/edit.php' \
&ensp; '../graphs-and-charts/research-pie.php'

## edit.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('edit.inc.php') \
include_once('../../ui-layout/footer.inc')

## index.filtered.inc.php
require_once('controller.php') \
include_once('../../core/protect.php')

## index.inc.php
include_once('../../core/protect.php') \
Also uses '../../core/logout.php' </br>
&ensp; 'add.php'

## index.php
include_once('../../core/protect.php') \
require_once('controller.php') \
include_once('../../ui-layout/header.inc') \
include_once('index.inc.php') \
include_once('../../ui-layout/footer.inc')

## index.unfiltered.inc.php
require_once('controller.php') \
include_once('../../core/protect.php') \

## remove-xref.php
require_once('controller.php') \
include_once('../../core/protect.php') \
Also uses 'edit.php'

## remove.php
include_once('../../core/protect.php') \
include_once('controller.php') \
Also uses '../admin-tasks/' <- redirects to main page \
include_once('../../ui-layout/header.inc') \
Also uses '../../core/logout.php' </br>
&ensp; '../staff-members/edit.php' \
include_once('../../ui-layout/footer.inc')

