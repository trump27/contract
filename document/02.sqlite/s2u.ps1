# shit-jis to utf-8

Param( $in_file, $out_file )
get-content -Encoding default $in_file | Out-File -Encoding UTF8 $out_file
