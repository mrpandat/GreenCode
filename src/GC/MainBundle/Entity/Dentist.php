<?php

namespace GC\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dentist
 *
 * @ORM\Table(name="dentist")
 * @ORM\Entity(repositoryClass="GC\MainBundle\Repository\DentistRepository")
 */
class Dentist
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="Lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="Gender", type="smallint")
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="Phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="text", nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="Specialty", type="string", length=255, nullable=true)
     */
    private $specialty;

    /**
     * @var int
     *
     * @ORM\Column(name="MondayOpening", type="integer", nullable=true)
     */
    private $mondayOpening;

    /**
     * @var int
     *
     * @ORM\Column(name="MondayClosing", type="integer", nullable=true)
     */
    private $mondayClosing;

    /**
     * @var int
     *
     * @ORM\Column(name="TuesdayOpening", type="integer", nullable=true)
     */
    private $tuesdayOpening;

    /**
     * @var int
     *
     * @ORM\Column(name="TuesdayClosing", type="integer", nullable=true)
     */
    private $tuesdayClosing;

    /**
     * @var int
     *
     * @ORM\Column(name="WednesdayOpening", type="integer", nullable=true)
     */
    private $wednesdayOpening;

    /**
     * @var int
     *
     * @ORM\Column(name="WednesdayClosing", type="integer", nullable=true)
     */
    private $wednesdayClosing;

    /**
     * @var int
     *
     * @ORM\Column(name="ThursdayOpening", type="integer", nullable=true)
     */
    private $thursdayOpening;

    /**
     * @var int
     *
     * @ORM\Column(name="ThursdayClosing", type="integer", nullable=true)
     */
    private $thursdayClosing;

    /**
     * @var int
     *
     * @ORM\Column(name="FridayOpening", type="integer", nullable=true)
     */
    private $fridayOpening;

    /**
     * @var int
     *
     * @ORM\Column(name="FridayClosing", type="integer", nullable=true)
     */
    private $fridayClosing;

    /**
     * @var int
     *
     * @ORM\Column(name="SaturdayOpening", type="integer", nullable=true)
     */
    private $saturdayOpening;

    /**
     * @var int
     *
     * @ORM\Column(name="SaturdayClosing", type="integer", nullable=true)
     */
    private $saturdayClosing;

    /**
     * @var int
     *
     * @ORM\Column(name="SundayOpening", type="integer", nullable=true)
     */
    private $sundayOpening;

    /**
     * @var int
     *
     * @ORM\Column(name="SundayClosing", type="integer", nullable=true)
     */
    private $sundayClosing;

    /**
     * @var int
     *
     * @ORM\Column(name="MondayOpened", type="smallint")
     */
    private $mondayOpened;

    /**
     * @var int
     *
     * @ORM\Column(name="TuesdayOpened", type="smallint")
     */
    private $tuesdayOpened;

    /**
     * @var int
     *
     * @ORM\Column(name="WednesdayOpened", type="smallint")
     */
    private $wednesdayOpened;

    /**
     * @var int
     *
     * @ORM\Column(name="ThursdayOpened", type="smallint")
     */
    private $thursdayOpened;

    /**
     * @var int
     *
     * @ORM\Column(name="FridayOpened", type="smallint")
     */
    private $fridayOpened;

    /**
     * @var int
     *
     * @ORM\Column(name="SaturdayOpened", type="smallint")
     */
    private $saturdayOpened;

    /**
     * @var int
     *
     * @ORM\Column(name="SundayOpened", type="smallint")
     */
    private $sundayOpened;

    /**
     * @var int
     *
     * @ORM\Column(name="HasOpenings", type="smallint")
     */
    private $hasOpenings;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Dentist
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Dentist
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Dentist
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     *
     * @return Dentist
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Dentist
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Dentist
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Dentist
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set specialty
     *
     * @param string $specialty
     *
     * @return Dentist
     */
    public function setSpecialty($specialty)
    {
        $this->specialty = $specialty;

        return $this;
    }

    /**
     * Get specialty
     *
     * @return string
     */
    public function getSpecialty()
    {
        return $this->specialty;
    }

    /**
     * Set mondayOpening
     *
     * @param integer $mondayOpening
     *
     * @return Dentist
     */
    public function setMondayOpening($mondayOpening)
    {
        $this->mondayOpening = $mondayOpening;

        return $this;
    }

    /**
     * Get mondayOpening
     *
     * @return int
     */
    public function getMondayOpening()
    {
        return $this->mondayOpening;
    }

    /**
     * Set mondayClosing
     *
     * @param integer $mondayClosing
     *
     * @return Dentist
     */
    public function setMondayClosing($mondayClosing)
    {
        $this->mondayClosing = $mondayClosing;

        return $this;
    }

    /**
     * Get mondayClosing
     *
     * @return int
     */
    public function getMondayClosing()
    {
        return $this->mondayClosing;
    }

    /**
     * Set tuesdayOpening
     *
     * @param integer $tuesdayOpening
     *
     * @return Dentist
     */
    public function setTuesdayOpening($tuesdayOpening)
    {
        $this->tuesdayOpening = $tuesdayOpening;

        return $this;
    }

    /**
     * Get tuesdayOpening
     *
     * @return int
     */
    public function getTuesdayOpening()
    {
        return $this->tuesdayOpening;
    }

    /**
     * Set tuesdayClosing
     *
     * @param integer $tuesdayClosing
     *
     * @return Dentist
     */
    public function setTuesdayClosing($tuesdayClosing)
    {
        $this->tuesdayClosing = $tuesdayClosing;

        return $this;
    }

    /**
     * Get tuesdayClosing
     *
     * @return int
     */
    public function getTuesdayClosing()
    {
        return $this->tuesdayClosing;
    }

    /**
     * Set wednesdayOpening
     *
     * @param integer $wednesdayOpening
     *
     * @return Dentist
     */
    public function setWednesdayOpening($wednesdayOpening)
    {
        $this->wednesdayOpening = $wednesdayOpening;

        return $this;
    }

    /**
     * Get wednesdayOpening
     *
     * @return int
     */
    public function getWednesdayOpening()
    {
        return $this->wednesdayOpening;
    }

    /**
     * Set wednesdayClosing
     *
     * @param integer $wednesdayClosing
     *
     * @return Dentist
     */
    public function setWednesdayClosing($wednesdayClosing)
    {
        $this->wednesdayClosing = $wednesdayClosing;

        return $this;
    }

    /**
     * Get wednesdayClosing
     *
     * @return int
     */
    public function getWednesdayClosing()
    {
        return $this->wednesdayClosing;
    }

    /**
     * Set thursdayOpening
     *
     * @param integer $thursdayOpening
     *
     * @return Dentist
     */
    public function setThursdayOpening($thursdayOpening)
    {
        $this->thursdayOpening = $thursdayOpening;

        return $this;
    }

    /**
     * Get thursdayOpening
     *
     * @return int
     */
    public function getThursdayOpening()
    {
        return $this->thursdayOpening;
    }

    /**
     * Set thursdayClosing
     *
     * @param integer $thursdayClosing
     *
     * @return Dentist
     */
    public function setThursdayClosing($thursdayClosing)
    {
        $this->thursdayClosing = $thursdayClosing;

        return $this;
    }

    /**
     * Get thursdayClosing
     *
     * @return int
     */
    public function getThursdayClosing()
    {
        return $this->thursdayClosing;
    }

    /**
     * Set fridayOpening
     *
     * @param integer $fridayOpening
     *
     * @return Dentist
     */
    public function setFridayOpening($fridayOpening)
    {
        $this->fridayOpening = $fridayOpening;

        return $this;
    }

    /**
     * Get fridayOpening
     *
     * @return int
     */
    public function getFridayOpening()
    {
        return $this->fridayOpening;
    }

    /**
     * Set fridayClosing
     *
     * @param integer $fridayClosing
     *
     * @return Dentist
     */
    public function setFridayClosing($fridayClosing)
    {
        $this->fridayClosing = $fridayClosing;

        return $this;
    }

    /**
     * Get fridayClosing
     *
     * @return int
     */
    public function getFridayClosing()
    {
        return $this->fridayClosing;
    }

    /**
     * Set saturdayOpening
     *
     * @param integer $saturdayOpening
     *
     * @return Dentist
     */
    public function setSaturdayOpening($saturdayOpening)
    {
        $this->saturdayOpening = $saturdayOpening;

        return $this;
    }

    /**
     * Get saturdayOpening
     *
     * @return int
     */
    public function getSaturdayOpening()
    {
        return $this->saturdayOpening;
    }

    /**
     * Set saturdayClosing
     *
     * @param integer $saturdayClosing
     *
     * @return Dentist
     */
    public function setSaturdayClosing($saturdayClosing)
    {
        $this->saturdayClosing = $saturdayClosing;

        return $this;
    }

    /**
     * Get saturdayClosing
     *
     * @return int
     */
    public function getSaturdayClosing()
    {
        return $this->saturdayClosing;
    }

    /**
     * Set sundayOpening
     *
     * @param integer $sundayOpening
     *
     * @return Dentist
     */
    public function setSundayOpening($sundayOpening)
    {
        $this->sundayOpening = $sundayOpening;

        return $this;
    }

    /**
     * Get sundayOpening
     *
     * @return int
     */
    public function getSundayOpening()
    {
        return $this->sundayOpening;
    }

    /**
     * Set sundayClosing
     *
     * @param integer $sundayClosing
     *
     * @return Dentist
     */
    public function setSundayClosing($sundayClosing)
    {
        $this->sundayClosing = $sundayClosing;

        return $this;
    }

    /**
     * Get sundayClosing
     *
     * @return int
     */
    public function getSundayClosing()
    {
        return $this->sundayClosing;
    }

    /**
     * Set mondayOpened
     *
     * @param integer $mondayOpened
     *
     * @return Dentist
     */
    public function setMondayOpened($mondayOpened)
    {
        $this->mondayOpened = $mondayOpened;

        return $this;
    }

    /**
     * Get mondayOpened
     *
     * @return int
     */
    public function getMondayOpened()
    {
        return $this->mondayOpened;
    }

    /**
     * Set tuesdayOpened
     *
     * @param integer $tuesdayOpened
     *
     * @return Dentist
     */
    public function setTuesdayOpened($tuesdayOpened)
    {
        $this->tuesdayOpened = $tuesdayOpened;

        return $this;
    }

    /**
     * Get tuesdayOpened
     *
     * @return int
     */
    public function getTuesdayOpened()
    {
        return $this->tuesdayOpened;
    }

    /**
     * Set wednesdayOpened
     *
     * @param integer $wednesdayOpened
     *
     * @return Dentist
     */
    public function setWednesdayOpened($wednesdayOpened)
    {
        $this->wednesdayOpened = $wednesdayOpened;

        return $this;
    }

    /**
     * Get wednesdayOpened
     *
     * @return int
     */
    public function getWednesdayOpened()
    {
        return $this->wednesdayOpened;
    }

    /**
     * Set thursdayOpened
     *
     * @param integer $thursdayOpened
     *
     * @return Dentist
     */
    public function setThursdayOpened($thursdayOpened)
    {
        $this->thursdayOpened = $thursdayOpened;

        return $this;
    }

    /**
     * Get thursdayOpened
     *
     * @return int
     */
    public function getThursdayOpened()
    {
        return $this->thursdayOpened;
    }

    /**
     * Set fridayOpened
     *
     * @param integer $fridayOpened
     *
     * @return Dentist
     */
    public function setFridayOpened($fridayOpened)
    {
        $this->fridayOpened = $fridayOpened;

        return $this;
    }

    /**
     * Get fridayOpened
     *
     * @return int
     */
    public function getFridayOpened()
    {
        return $this->fridayOpened;
    }

    /**
     * Set saturdayOpened
     *
     * @param integer $saturdayOpened
     *
     * @return Dentist
     */
    public function setSaturdayOpened($saturdayOpened)
    {
        $this->saturdayOpened = $saturdayOpened;

        return $this;
    }

    /**
     * Get saturdayOpened
     *
     * @return int
     */
    public function getSaturdayOpened()
    {
        return $this->saturdayOpened;
    }

    /**
     * Set sundayOpened
     *
     * @param integer $sundayOpened
     *
     * @return Dentist
     */
    public function setSundayOpened($sundayOpened)
    {
        $this->sundayOpened = $sundayOpened;

        return $this;
    }

    /**
     * Get sundayOpened
     *
     * @return int
     */
    public function getSundayOpened()
    {
        return $this->sundayOpened;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getHasOpenings()
    {
        return $this->hasOpenings;
    }

    /**
     * @param int $hasOpenings
     */
    public function setHasOpenings($hasOpenings)
    {
        $this->hasOpenings = $hasOpenings;
    }

    public function getMondayOpeningFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getMondayOpening() / 100, $this->getMondayOpening() % 100);
    }

    public function getMondayClosingFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getMondayClosing() / 100, $this->getMondayClosing() % 100);
    }

    public function getTuesdayOpeningFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getTuesdayOpening() / 100, $this->getTuesdayOpening() % 100);
    }

    public function getTuesdayClosingFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getTuesdayClosing() / 100, $this->getTuesdayClosing() % 100);
    }

    public function getWednesdayOpeningFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getWednesdayOpening() / 100, $this->getWednesdayOpening() % 100);
    }

    public function getWednesdayClosingFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getMondayClosing() / 100, $this->getMondayClosing() % 100);
    }

    public function getThursdayOpeningFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getThursdayOpening() / 100, $this->getThursdayOpening() % 100);
    }

    public function getThursdayClosingFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getThursdayClosing() / 100, $this->getThursdayClosing() % 100);
    }

    public function getFridayOpeningFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getFridayOpening() / 100, $this->getFridayOpening() % 100);
    }

    public function getFridayClosingFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getFridayClosing() / 100, $this->getFridayClosing() % 100);
    }

    public function getSaturdayOpeningFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getSaturdayOpening() / 100, $this->getSaturdayOpening() % 100);
    }

    public function getSaturdayClosingFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getSaturdayClosing() / 100, $this->getSaturdayClosing() % 100);
    }

    public function getSundayOpeningFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getSundayOpening() / 100, $this->getSundayOpening() % 100);
    }

    public function getSundayClosingFormatted()
    {
        return sprintf("%'02d:%'02d", $this->getSundayClosing() / 100, $this->getSundayClosing() % 100);
    }

    public function getIsCurrentlyOpened()
    {
        $day = date('l');
        if ($this->{'get' . $day . 'Opened'}())
        {
            $hour = intval(date('Hi'));
            return $hour <= $this->{'get' . $day . 'Closing'}() && $hour >= $this->{'get' . $day . 'Opening'}();
        }
        else
        {
            return false;
        }
    }
}

