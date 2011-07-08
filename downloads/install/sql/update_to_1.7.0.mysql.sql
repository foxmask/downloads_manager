INSERT INTO %%PREFIX%%jacl2_subject_group (id_aclsbjgrp, label_key) VALUES ('downloads.grp.management','downloads~acl2.downloads.management');
UPDATE %%PREFIX%%jacl2_rights set id_aclgrp = 'admins' WHERE id_aclgrp = 1 and id_aclsbj like 'downloads%';
UPDATE %%PREFIX%%jacl2_subject set id_aclsbjgrp =  'downloads.grp.management' WHERE id_aclsbj like 'downloads%';