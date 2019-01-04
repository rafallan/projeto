<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Curso
 *
 * @property int $id
 * @property string $nome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Curso onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Curso whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Curso withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Curso withoutTrashed()
 */
	class Curso extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $password
 * @property string $nivel
 * @property int $ativo
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAtivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNivel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

