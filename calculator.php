<?php
interface Shape
{
     public function calculateArea(): float;
     public function calculatePerimeter() : float;
}

class Circle implements Shape
{
    private float $radius;
    
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }
    
    public function calculateArea(): float
    {
        
        return (22/7)*$this->radius*$this->radius;
        
    }
    
    public function calculatePerimeter(): float
    {
       
        return 2*(22/7)*$this->radius;
    }
    
    
}

class Rectangle implements Shape
{
    private float $height;
    private float $width;
    
    public function __construct(float $height , float $width) 
    {
        $this->height = $height;
        $this->width = $width;
    }
    
    public function calculateArea(): float
    {
        
        return $this->height*$this->width;
        
    }
    
    public function calculatePerimeter(): float
    {
       
        return 2*($this->height+$this->width);
    }
    
    
}

class Square implements Shape
{
    private float $length;
    
    public function __construct(float $length)
    {
        $this->length = $length;
    }
    
    public function calculateArea(): float
    {
        return $this->length*$this->length;
    }
    
    public function calculatePerimeter(): float
    {
        return 4*$this->length;
    }
    
}

class CalCommandPrompt
{   
    
    public function showMessage(string $message) : void
    {
         echo $message;
    }
    
    public function showMainMessage() : void
    {
        $this->showMessage("\nchoose an option : \n\n1. Calculate Circle \n2. Calculate Rectangle \n3. Calculate Square \n4. Exit\n");
    }
    
    public function getAnswer(string $question):string
    {
        return readline($question);
    }
    
    public function startFlow() : void
    {
        $this->showMainMessage();
        $ans = $this->getAnswer("");
        
        switch($ans)
        {
            case 1:
                
                $radius = $this->getAnswer("Enter the radius :");
                $circle = new Circle($radius);
                $setA = $circle->calculateArea();
                $this->showMessage("Area is :$setA");
                $setP = $circle->calculatePerimeter();
                $this->showMessage("\nPerimeter is :$setP\n");
                break;
            case 2:
                $height = $this->getAnswer("Enter the height :");
                $width = $this->getAnswer("Enter the width :");
                $rectangle = new Rectangle($height , $width);
                $setA = $rectangle->calculateArea();
                $setP = $rectangle->calculatePerimeter();
                $this->showMessage("Area is :$setA");
                $this->showMessage("\nPerimeter is :$setP\n");
                break;
            case 3:
                $length = $this->getAnswer("Enter length :");
                $square = new Square($length);
                $setA = $square->calculateArea();
                $setP = $square->calculatePerimeter();
                $this->showMessage("Area is :$setA");
                $this->showMessage("\nPerimeter is :$setP\n");
                break;
            case 4:
                exit;
            default:
                $this->showMessage("Unsupported Output....Try again !.\n");
                break;
                
        }
        $this->startFlow();
    }
}

$calCommandPrompt = new CalCommandPrompt();
$calCommandPrompt->startFlow();

?>
