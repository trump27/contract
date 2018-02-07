<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Datasource\ConnectionManager;
use \SplFileObject;

/**
 * Import shell command.
 * ex. cake import tablename filename
 */
class ImportShell extends Shell
{

    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    public function main()
    {
        // $this->out($this->OptionParser->help());
        if (empty($this->args[1])) {
            $db = ConnectionManager::get('default');
            $collection = $db->schemaCollection();
            $tables = $collection->listTables();
            foreach ($tables as $tbl) {
                $this->out($tbl);
            }
            return $this->abort('cake import tablename filename');
        }
        if (!empty($this->args[1])) {
            $tmpdir = $this->args[1];
        }
        $model = ucfirst($this->args[0]);
        $infile = $this->args[1];

        $this->loadModel($model);
        // truncate
        $db = ConnectionManager::get('default');
        
        // debug($db->config()['driver']);
        if(strpos($db->config()['driver'], 'Sqlite') === false) {
            // Sqlite以外
            $db->query("truncate table $model");
        } else {
            // Sqlite
            $db->query("delete from $model");
            $deletenome = strtolower($model);
            $db->query("DELETE FROM sqlite_sequence WHERE name = '$deletenome'");
        }


        $file = new SplFileObject($infile);
        $file->setFlags(SplFileObject::READ_CSV);

        $counter = 0;
        $header = [];
        foreach ($file as $row) {
            if ($row === [null]) {
                continue;
            }

            if (empty($header)) {
                $header = $row;
                continue;
            }
            // $row = mb_convert_encoding($row, "UTF-8");
            mb_convert_variables("UTF-8", "SJIS-win", $row);

            $data = array_combine($header, $row);
            // mb_convert_variables("UTF-8", "SJIS-win", $data);

            // debug($data);

            $item = $this->$model->newEntity();
            // $this->out("result : " . print_r($item->errors()));
            $item = $this->$model->patchEntity($item, $data);

            if (!$this->$model->save($item)) {
                print_r($data);
                $this->out("登録エラー");
                return;
            }
            $counter++;
        }
        $this->out("$counter records imported.");

    }

}
