<?php
//registr
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'match', 'pattern' => '/[^a-z]$/', 'message' => 'Разрешена только кириллица'],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
            [['image'], 'file', 'extensions' => 'png', 'maxSize' => '1048576'],
        ];
    }


    public function upload(){
        if($this->validate()){
            $this->image->saveAs("uploads/{$this->image->baseName}.{$this->image->extension}");
        }else{
            return false;
        }
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $this->image = UploadedFile::getInstance($this, 'image');
        $user->username = $this->username;
        $user->email = $this->email;
        $user->avatar = $this->image->baseName.".".$this->image->extension;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $this->upload();
        return $user->save() ? $user : null;
    }
}