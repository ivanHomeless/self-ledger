<?php
namespace App\Enums;

enum AccessType: string
{
    case FTP = 'ftp';
    case SSH = 'ssh';
    case AdminPanel = 'admin_panel';
    case Hosting = 'hosting';
    case API = 'api';
    case Other = 'other';
}
