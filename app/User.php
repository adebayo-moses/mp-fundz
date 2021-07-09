<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'gender',
        'country',
        'user_type',
        'coin_balance',
        'refferal_revenue',
        'subscribed_to_news_letter',
        'referrer_id',
        'password',
        'last_login_at',
        'created_at',
    ];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }

    public function withdrawals()
    {
        return $this->hasMany('App\Models\Withdrawal');
    }

    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }

    public function contests()
    {
        return $this->belongsToMany('App\Models\Contest', 'contest_user');
    }

    public function entries()
    {
        return $this->hasMany('App\Models\Entry');
    }

    /**
     * A user has a referrer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    /**
     * A user has many referrals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
    ];



    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['referral_link', 'total_coin_balance', 'amount_in_dollars'];

    /**
     * Get the user's referral link.
     *
     * @return string
     */
    public function getReferralLinkAttribute()
    {
        return $this->referral_link = route('register', ['ref' => $this->username]);
    }


    public function getTotalCoinBalanceAttribute()
    {
        return (float) $this->total_coin_balance = (float) ((float) $this->coin_balance + (float) $this->refferal_revenue);
    }

    public function getAmountInDollarsAttribute()
    {
        return $this->amount_in_dollars =  ((float) $this->coin_balance) / 100;;
    }
}
