# utf-8 to shit-jis

Param( $in_file, $out_file )
get-content -Encoding UTF8 $in_file | Out-File -Encoding default $out_file
