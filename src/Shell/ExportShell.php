<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Datasource\ConnectionManager;
use \SplFileObject;

/**
 * Export shell command.
 * ex. cake export Tablename [output dir]
 */
class ExportShell extends Shell
{

    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    public function main()
    {
        // $this->out($this->OptionParser->help());
        if (empty($this->args[0])) {
            $db = ConnectionManager::get('default');
            $collection = $db->schemaCollection();
            $tables = $collection->listTables();
            foreach ($tables as $tbl) {
                $this->out($tbl);
            }
            return $this->abort('Please enter a modelname.');
        }
        $tmpdir = ROOT . DS . 'tmp';
        if (!empty($this->args[1])) {
            $tmpdir = $this->args[1];
        }
        $model = ucfirst($this->args[0]);
        $this->out("model : $model");
        $this->out("output directory : $tmpdir");


        $this->loadModel($model);


        $data = $this->$model->find('all');

        $data->enableHydration(false);

        $fname = $tmpdir . DS . $model . ".csv";
        $file = new SplFileObject($fname, 'w');
        $line =
        $file->fputcsv($this->$model->schema()->columns());

        $counter = 0;
        foreach ($data as $line) {
            mb_convert_variables("SJIS-win", "UTF-8", $line);
            $file->fputcsv($line);
            $counter++;
        }
        $file = null;
        $this->out("$counter records exported.");
    }

}
