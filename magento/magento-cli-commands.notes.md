# turn on template hints from msyql
UPDATE core_config_data SET value = '0' WHERE path LIKE '%template_hints%';

