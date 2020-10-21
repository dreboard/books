<?php
/**
 * @since       v0.1.0
 * @package     Dev-PHP
 * @author      Andre Board <dre.board@gmail.com>
 * @version     v1.0
 * @access      public
 * @see         https://github.com/dreboard/books
 */

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Throwable;

class BookService
{

    /**
     * Search the Google Books API
     *
     * @param $param
     * @return mixed
     */
    public function searchBooks(string $param)
    {
        try{
            $service = resolve('Google_Client');
            $optParams = array(
                'filter' => 'free-ebooks',
                'q' => $param
            );
            return $service->volumes->listVolumes($optParams);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return [];
        }
    }


    /**
     * Send ISBN to google for detail page
     *
     * @param string|null $id
     * @return array|\Google_Service_Books_Volumes
     */
    public function getById(?string $id)
    {
        try{
            $service = resolve('Google_Client');
            $optParams = array(
                'filter' => 'free-ebooks',
                'q' => 'isbn:'.$id
            );
            return $service->volumes->listVolumes($optParams);
        }catch (Throwable $e){
            Log::error($e->getMessage());
            return [];
        }
    }

}
