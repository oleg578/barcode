<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Printer
 *
 * @property int $id
 * @property string $name
 * @property string $ip
 * @property int $port
 * @property string $zpl_prefix
 * @property string $zpl_suffix
 * @property string $zpl_code
 * @property int $offline
 * @property string|null $offlinetime
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer whereOffline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer whereOfflinetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer whereZplCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer whereZplPrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Printer whereZplSuffix($value)
 */
	class Printer extends \Eloquent {}
}

namespace App{
/**
 * App\Barcode
 *
 * @property int $id
 * @property string $code
 * @property string $employee_pseudo
 * @property string $printer_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Barcode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Barcode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Barcode query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Barcode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Barcode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Barcode whereEmployeePseudo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Barcode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Barcode wherePrinterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Barcode whereUpdatedAt($value)
 */
	class Barcode extends \Eloquent {}
}

namespace App{
/**
 * App\Order
 *
 * @property int $id
 * @property int $profileid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereProfileid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App{
/**
 * App\Profile
 *
 * @property int $id
 * @property string $name
 * @property string $symbol
 * @property mixed|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 */
	class Profile extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $employee_id
 * @property string $pseudo
 * @property int $active
 * @property string $password
 * @property string|null $remember_token
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePseudo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

