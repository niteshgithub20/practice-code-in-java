import java.util.Scanner;
import java.util.*;
class Palins
{
    public void palindrom(int n){
        int sum=0,remainder;
        int temp = n;
        while(n>0)
        {
            remainder = n%10;
            sum = (sum*10)+remainder;
            n = n/10;
                       
        }
        if(temp == sum)
        {
            System.out.println("This is a palindrom: " +sum);
        }else{
            System.out.println("This is not a palindrom :" +sum);
        }
    }
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter the values to find palindrom ");
        int n = sc.nextInt();
        Palins pl = new Palins();
        pl.palindrom(n);
    }
}
