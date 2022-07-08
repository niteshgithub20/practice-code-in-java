import java.util.*;
import java.util.Scanner;
class Fibo {
    public void fibonacci(int count){
        int n1=0,n2=1;
        int firstadd=0;
         System.out.println("The fibonacci series are : \n");
        for(int i=0;i<count;i++){
            firstadd = n1+n2;
            n1 = n2;
            n2=firstadd;
           
            System.out.println(firstadd);
        }
       
    }
    public void palindrom(int num){
        int rem,sum=0;
        int temp = num;
        while(num>0){
            rem = num%10;
            sum = (sum*10)+num;
            num = num/10;
        }if(temp == num){
             System.out.println("It is palindrom " +sum);
        }else{
             System.out.println("It is  not palindrom " +sum);
        }
        
    }

    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter the number for Fibonacci_series : ");
        int count = sc.nextInt();
        System.out.println("Enter the number for palindrom : ");
        int num = sc.nextInt();
        Fibo dg = new Fibo();
        dg.fibonacci(count);
        System.out.println("==============================\n");
        dg.palindrom(num);
    }
}