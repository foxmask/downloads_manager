INSERT INTO %%PREFIX%%jacl2_rights (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.index', 1, '');
INSERT INTO %%PREFIX%%jacl2_rights (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.list', 1, '');
INSERT INTO %%PREFIX%%jacl2_rights (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.config', 1, '');
INSERT INTO %%PREFIX%%jacl2_rights (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.edit', 1, '');
INSERT INTO %%PREFIX%%jacl2_rights (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.delete', 1, '');

INSERT INTO %%PREFIX%%jacl2_subject (id_aclsbj, label_key) VALUES ('downloads.index', 'downloads~acl2.downloads.index');
INSERT INTO %%PREFIX%%jacl2_subject (id_aclsbj, label_key) VALUES ('downloads.list', 'downloads~acl2.downloads.list');
INSERT INTO %%PREFIX%%jacl2_subject (id_aclsbj, label_key) VALUES ('downloads.config', 'downloads~acl2.downloads.config');
INSERT INTO %%PREFIX%%jacl2_subject (id_aclsbj, label_key) VALUES ('downloads.edit', 'downloads~acl2.downloads.edit');
INSERT INTO %%PREFIX%%jacl2_subject (id_aclsbj, label_key) VALUES ('downloads.delete', 'downloads~acl2.downloads.delete');

INSERT INTO %%PREFIX%%jacl2_rights (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.index', 'admins', '');
INSERT INTO %%PREFIX%%jacl2_rights (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.list', 'admins', '');
INSERT INTO %%PREFIX%%jacl2_rights (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.config', 'admins', '');
INSERT INTO %%PREFIX%%jacl2_rights (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.edit', 'admins', '');
INSERT INTO %%PREFIX%%jacl2_rights (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.delete', 'admins', '');

INSERT INTO %%PREFIX%%jacl2_subject (id_aclsbj, label_key, id_aclsbjgrp) VALUES ('downloads.index', 'downloads~acl2.downloads.index','downloads.grp.management');
INSERT INTO %%PREFIX%%jacl2_subject (id_aclsbj, label_key, id_aclsbjgrp) VALUES ('downloads.list', 'downloads~acl2.downloads.list','downloads.grp.management');
INSERT INTO %%PREFIX%%jacl2_subject (id_aclsbj, label_key, id_aclsbjgrp) VALUES ('downloads.config', 'downloads~acl2.downloads.config','downloads.grp.management');
INSERT INTO %%PREFIX%%jacl2_subject (id_aclsbj, label_key, id_aclsbjgrp) VALUES ('downloads.edit', 'downloads~acl2.downloads.edit','downloads.grp.management');
INSERT INTO %%PREFIX%%jacl2_subject (id_aclsbj, label_key, id_aclsbjgrp) VALUES ('downloads.delete', 'downloads~acl2.downloads.delete','downloads.grp.management');

INSERT INTO %%PREFIX%%jacl2_subject_group (id_aclsbjgrp, label_key) VALUES ('downloads.grp.management','downloads~acl2.downloads.management');